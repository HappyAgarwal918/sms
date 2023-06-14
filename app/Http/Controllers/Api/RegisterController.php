<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\userEducation;
use App\Models\userExperience;
use App\Models\userMedicalRecord;
use App\Models\userExtra;
use App\Models\extra_achieve_file;
use App\Models\diploma_file;
use App\Models\doctorate_file;
use App\Models\exp_certificate_file;
use App\Models\file_10th;
use App\Models\file_12th;
use App\Models\graduation_file;
use App\Models\id_proof;
use App\Models\pcc_file;
use App\Models\post_graduation_file;
use App\Models\special_edu_file;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Password;
use Mail;
use Log;
use App\Mail\DemoMail;

class RegisterController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return User 
     */
    public function createUser(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
                'f_name' => 'required',
                'l_name' => 'required',
                'dob' => 'required',
                'email' => 'required|email|unique:users,email',
                'p_number' => 'required',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }
            if ($request->profile_pic_file) {
                $profile_pic_name = $request->file('profile_pic_file')->getClientOriginalName();
                $profile_pic_path = $request->file('profile_pic_file')->store('public/profile_pic_file');
            }else{
                $profile_pic_name = null;
                $profile_pic_path = null;
            }

            $dob = $request->date.$request->month.$request->year;

            $user = User::create([
                'f_name' => $request->f_name,
                'l_name' => $request->l_name,
                'dob' => $dob,
                'per_address' => $request->per_address,
                'corr_address' => $request->corr_address,
                'p_number' => $request->p_number,
                'emer_number' => $request->emer_number,
                'email' => $request->email,
                'emer_email' => $request->emer_email,
                'blood_group' => $request->blood_group,
                'user_role' => $request->user_role,
                'device_type' => $request->device_type,
                'device_token' => $request->device_token,
                'profile_pic_name' => $profile_pic_name,
                'profile_pic_path' => $profile_pic_path,
                'password' => Hash::make($request->password)
            ]);

            if(!empty($user)){
                $user_data = userEducation::create([
                    'user_id' => $user['id'],
                    'number_10th' => $request->number_10th,
                    'year_10th' => $request->year_10th,
                    'number_12th' => $request->number_12th,
                    'year_12th' => $request->year_12th,
                    'graduation_number' => $request->graduation_number,
                    'graduation_year' => $request->graduation_year,
                    'post_grad_number' => $request->post_grad_number,
                    'post_grad_year' => $request->post_grad_year,
                    'doctorate_number' => $request->doctorate_number,
                    'doctorate_year' => $request->doctorate_year,
                    'diploma_number' => $request->diploma_number,
                    'diploma_year' => $request->diploma_year,
                    'special_edu_number' => $request->special_edu_number,
                    'special_edu_year' => $request->special_edu_year,
                ]);

                if ($request->id_proof) {
                    foreach($request->file('id_proof') as $id_proof_)
                    {
                        $id_proof_name = $id_proof_->getClientOriginalName();
                        $id_proof_path = $id_proof_->store('public/id_proof');

                        $user_data = id_proof::create([
                            'user_id' => $user['id'],
                            'id_proof_name' => $id_proof_name,
                            'id_proof_path' => $id_proof_path,
                        ]);
                    }
                }

                if ($request->file_10th) {
                    foreach($request->file('file_10th') as $file_10th_)
                    {
                        $file_name_10th = $file_10th_->getClientOriginalName();
                        $file_path_10th = $file_10th_->store('public/file_10th');

                        $user_data = file_10th::create([
                            'user_id' => $user['id'],
                            'file_name_10th' => $file_name_10th,
                            'file_path_10th' => $file_path_10th,
                        ]);
                    }
                }

                if ($request->file_12th) {
                    foreach($request->file('file_12th') as $file_12th_)
                    {
                        $file_name_12th = $file_12th_->getClientOriginalName();
                        $file_path_12th = $file_12th_->store('public/file_12th');

                        $user_data = file_12th::create([
                            'user_id' => $user['id'],
                            'file_name_12th' => $file_name_12th,
                            'file_path_12th' => $file_path_12th,
                        ]);
                    }
                }

                if ($request->graduation_file) {
                    foreach($request->file('graduation_file') as $graduation_file_)
                    {
                        $graduation_file_name = $graduation_file_->getClientOriginalName();
                        $graduation_file_path = $graduation_file_->store('public/graduation_file');

                        $user_data = graduation_file::create([
                            'user_id' => $user['id'],
                            'graduation_file_name' => $graduation_file_name,
                            'graduation_file_path' => $graduation_file_path,
                        ]);
                    }
                }

                if ($request->post_graduation_file) {
                    foreach($request->file('post_graduation_file') as $post_graduation_file_)
                    {
                        $post_grad_file_name = $post_graduation_file_->getClientOriginalName();
                        $post_grad_file_path = $post_graduation_file_->store('public/post_graduation_file');

                        $user_data = post_graduation_file::create([
                            'user_id' => $user['id'],
                            'post_grad_file_name' => $post_grad_file_name,
                            'post_grad_file_path' => $post_grad_file_path,
                        ]);
                    }
                }

                if ($request->doctorate_file) {
                    foreach($request->file('doctorate_file') as $doctorate_file_)
                    {
                        $doctorate_file_name = $doctorate_file_->getClientOriginalName();
                        $doctorate_file_path = $doctorate_file_->store('public/doctorate_file');

                        $user_data = doctorate_file::create([
                            'user_id' => $user['id'],
                            'doctorate_file_name' => $doctorate_file_name,
                            'doctorate_file_path' => $doctorate_file_path,
                        ]);
                    }
                }

                if ($request->diploma_file) {
                    foreach($request->file('diploma_file') as $diploma_file_)
                    {
                        $diploma_file_name = $diploma_file_->getClientOriginalName();
                        $diploma_file_path = $diploma_file_->store('public/diploma_file');

                        $user_data = diploma_file::create([
                            'user_id' => $user['id'],
                            'diploma_file_name' => $diploma_file_name,
                            'diploma_file_path' => $diploma_file_path,
                        ]);
                    }
                }

                if ($request->special_edu_file) {
                    foreach($request->file('special_edu_file') as $special_edu_file_)
                    {
                        $special_edu_file_name = $special_edu_file_->getClientOriginalName();
                        $special_edu_file_path = $special_edu_file_->store('public/special_edu_file');

                        $user_data = special_edu_file::create([
                            'user_id' => $user['id'],
                            'special_edu_file_name' => $special_edu_file_name,
                            'special_edu_file_path' => $special_edu_file_path,
                        ]);
                    }
                }

                if ($request->exp_certificate_file) {
                    foreach($request->file('exp_certificate_file') as $exp_certificate_file_)
                    {
                        $exp_certificate_name = $exp_certificate_file_->getClientOriginalName();
                        $exp_certificate_path = $exp_certificate_file_->store('public/exp_certificate_file');

                        $user_data = exp_certificate_file::create([
                            'user_id' => $user['id'],
                            'exp_certificate_name' => $exp_certificate_name,
                            'exp_certificate_path' => $exp_certificate_path,
                        ]);
                    }
                }

                if ($request->pcc_file) {
                    foreach($request->file('pcc_file') as $pcc_file_)
                    {
                        $pcc_name = $pcc_file_->getClientOriginalName();
                        $pcc_path = $pcc_file_->store('public/pcc_file');

                        $user_data = pcc_file::create([
                            'user_id' => $user['id'],
                            'pcc_name' => $pcc_name,
                            'pcc_path' => $pcc_path,
                        ]);
                    }
                }

                if ($request->extra_achieve_file) {
                    foreach($request->file('extra_achieve_file') as $extra_achieve_file_)
                    {
                        $extra_achieve_name = $extra_achieve_file_->getClientOriginalName();
                        $extra_achieve_path = $extra_achieve_file_->store('public/extra_achieve_file');

                        $user_data = extra_achieve_file::create([
                            'user_id' => $user['id'],
                            'extra_achieve_name' => $extra_achieve_name,
                            'extra_achieve_path' => $extra_achieve_path,
                        ]);
                    }
                }

                $user_data = userExperience::create([
                    'user_id' => $user['id'],
                    'institute_name' => $request->institute_name,
                    'designation' => $request->designation,
                    'joining_date' => $request->joining_date,
                    'end_date' => $request->end_date,
                ]);

                $user_data = userMedicalRecord::create([
                    'user_id' => $user['id'],
                    'blood_group' => $request->blood_group,
                    'medical_condition' => $request->medical_condition,
                    'vaccination' => $request->vaccination,
                    'allergies' => $request->allergies,
                ]);

                $user_data = userExtra::create([
                    'user_id' => $user['id'],
                    'police_case' => $request->police_case,
                    'extra_achievement' => $request->extra_achievement,
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken,
                'role' => $user->user_role,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}