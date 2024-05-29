<?php
  
  namespace App\Http\Controllers\Auth;

  use App\Http\Controllers\Controller;
  use Illuminate\Http\Request;
  use Illuminate\Support\Facades\Auth;
  use Session;
  use App\Models\User;
  use Hash;
  use Illuminate\View\View;
  use Illuminate\Http\RedirectResponse;
  
  class AuthController extends Controller
  {
      /**
       * Show login form.
       *
       * @return View
       */
      public function index(): View
      {
          return view('auth.login');
      }
  
      /**
       * Show registration form.
       *
       * @return View
       */
      public function registration(): View
      {
          return view('auth.registration');
      }
  
      /**
       * Handle login request.
       *
       * @param Request $request
       * @return RedirectResponse
       */
      public function postLogin(Request $request): RedirectResponse
      {
          $request->validate([
              'email' => 'required|email',
              'password' => 'required',
          ]);
  
          $credentials = $request->only('email', 'password');
          if (Auth::attempt($credentials)) {
              return redirect()->intended('projects')
                  ->with('success', 'You have successfully logged in');
          }
  
          return redirect("login")->with('error', 'Oops! You have entered invalid credentials');
      }
  
      /**
       * Handle registration request.
       *
       * @param Request $request
       * @return RedirectResponse
       */
      public function postRegistration(Request $request): RedirectResponse
      {
          $request->validate([
              'name' => 'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|confirmed',
          ]);
  
          $data = $request->all();
          $user = $this->create($data);
  
          Auth::login($user);
  
          return redirect("projects")->with('success', 'Great! You have successfully logged in');
      }
  
      /**
       * Show dashboard.
       *
       * @return View|RedirectResponse
       */
      public function dashboard()
      {
          if (Auth::check()) {
              return view('projects');
          }
  
          return redirect("login")->with('error', 'Oops! You do not have access');
      }
  
      /**
       * Create a new user instance.
       *
       * @param array $data
       * @return User
       */
      public function create(array $data): User
      {
          return User::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'password' => Hash::make($data['password']),
          ]);
      }
  
      /**
       * Logout user.
       *
       * @return RedirectResponse
       */
      public function logout(): RedirectResponse
      {
          Session::flush();
          Auth::logout();
  
          return redirect('login');
      }
  }
  