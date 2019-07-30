# social-id
A PHP Backend for a Social Account Management System.
All functions and arguments should be called and passed directly in the URL.

## Functions

* Register an User with Username, Password & Name
```
localhost/social-id/index.php?regUser&uname=<username>&pass=<password>&name=<name>
```

* Signin with Username & Password & Start Session
```
localhost/social-id/index.php?signIn&uname=<username>&pass=<password>
```

* Signout & Destroy Session
```
localhost/social-id/app.php?signOut
```

* Add Social account with Name, URL & its visibility
```
localhost/social-id/app.php?addSocial&acc=<social_name>&url=<url>&visible=<public/private>
```