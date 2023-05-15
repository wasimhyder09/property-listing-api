Notes to create an API.

1. Make Authentication:
  (1.1) Make AuthController using termianl.
  (1.2) Then go to https://github.com/codewithdary/laravel-sanctum-tutorial link and copy code from app/Http/Controllers/AuthController file code in our controller.
  (1.3) Inside App directory, create a new folder called Traits and inside that, create a new file HttpResponses.php. Then copy the code from github repo into our newly created file from same path.
  (1.4) Create two Requests from CLI using artisan make:request, named LoginUserRequest and StoreUserRequest. Then copy the code for both files from above repo under app/Http/Requests folder.
  (1.5) Then create routes in routes/api.php file. Create public POST routes for "/login" and "/register" and a protected POST route for "/logout". The protected route group will have a middlware named auth:sanctum.
  (1.6) To test the authentication system, we use Postman. In Postman, Headers are set to [Accept => application/vnd.api+json] and [Content-Type => application/vnd.api+json]. Then Body will be set in x-www-form-urlencoded.

2. Create Controllers:
  (2.1) Then we need to create controllers and remove create() and edit() methods from the controllers as we don't need to show add and edit forms. All the data will be created and updated on back-end using API calls.

3. Create Routes:
  (3.1) We can create API routes using Route::apiResource() method which will give us all the API related routes of a controller.
  Note: All the routes created inside routes/api.php file will automatically start with "/api" in the URL.
  (3.2) Create public routes for show and index and for store, update and destroy, wrap them inside protected routes group using 3.1 and then chaining only() method to the routes.

4. Create Resources:
  Resources are used to map the data from controller functions and send the mapped fields in API response.
  (4.1) Use make:resource [ControllerNameResource] command to create the resource.
  (4.2) Inside toArray() function of resource, retun new array with key-value pairs for that controller value. Like 'id' => $this->id and so on.
  (4.3) To use resource insid the function, use defination like this:
        return ControllerNameResource::collection(ModelName::all()).
  (4.4) To return a single resource, use return ControllerNameResource($newResourceVariable);
  (4.5) For show, replace $id parameter with (ModelName $modelVariable) and return like 4.4
  (4.6) For update, replace $id with varibales like 4.5. Then inside the method, use generice variables. For example $modelVariable->update($request->only['name1', 'name2']) etc.
  (4.7) For delete, simply use Model->delete() and return a response()->json(['success' => true, 'message' => 'Deleted succesfully']);
  
5. Create Requests:
  In order to validate the requests in a separate file, we use make:request StoreControllerNameRequest.
  (5.1) Change authorize() to true and under rules() function, define all the rules.
  (5.2) In cotroller, replace Request facade with newly crated request.
  (5.3) In order to make it work, use $request->validated(); inside the controller function.
  (5.4) To create a single request for create and update, inside request file, create new private function isPostRequest. Then get the request type using request()->isMethod('post')? 'required' : 'sometimes';
  This way, you can replace the required attribute with the function call using "$this->isPostRequest" and it will change the values based on post or put request and will validate accordingly.