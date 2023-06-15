<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\User;
Class UserController extends Controller {
private $request;
public function __construct(Request $request){
$this->request = $request;
}

//GET PRODUCTS
public function getUsers(){
$users = User::all();
return response()->json($users, 200);
}

/**
* Return the list of users
* @return Illuminate\Http\Response
*/


// public function index()
// {
// $users = User::all();
// //return $this->successResponse($users);

// return response()->json($users, 200);
// }

//ADD PRODUCT
public function add(Request $request ){
$rules = [
'payment_category' => 'required|max:20',
'payment_date' => 'required|max:20',
'amount' => 'required|numeric|min:1|not_in:0',
];
$this->validate($request,$rules);
$user = User::create($request->all());
//return $this->successResponse($user,Response::HTTP_CREATED);
return response()->json($user, 200);

}
/**
* Obtains and show one user
* @return Illuminate\Http\Response
*/

//GET PRODUCT BY ID
public function show($id)
{
$user = User::findOrFail($id);
//return $this->successResponse($user);

return response()->json($user, 200);

}
/**
* Update an existing author
* @return Illuminate\Http\Response
*/

//UPDATE PRODUCT
public function update(Request $request,$id)
{
$rules = [
    'payment_category' => 'required|max:20',
    'payment_date' => 'required|max:20',
    'amount' => 'required|numeric|min:1|not_in:0',
];
$this->validate($request, $rules);
$user = User::findOrFail($id);
$user->fill($request->all());
// if no changes happen
if ($user->isClean()) {
    return $this->errorResponse('At least one value must
    change', Response::HTTP_UNPROCESSABLE_ENTITY);
    }
    $user->save();
   // return $this->successResponse($user);
   return response()->json($user, 200);
    }
    /**
    * Remove an existing user
    * @return Illuminate\Http\Response
    */

    //DELETE PRODUCT
    public function delete($id)
    {
    $user = User::findOrFail($id);
    $user->delete();
   // return $this->successResponse($user);
   return response()->json($user, 200);
}

}