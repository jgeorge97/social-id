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

* Get Username by ID
```
localhost/social-id/app.php?getUser&uid=<id>
```

* Send a Friend Request
```
localhost/social-id/app.php?sendReq&fuid=<id>
```

* List all Friend Requests by nameof current user
```
localhost/social-id/app.php?listReqName
```

* List all Friend Requests by nameof current user
```
localhost/social-id/app.php?listReqID
```

* List all Friends of current user
```
localhost/social-id/app.php?listFrnd
```

* Accept a friend request by a FID
```
localhost/social-id/app.php?accReq&fid=<fid>
```

* Reject a friend request by a FID
```
localhost/social-id/app.php?rejReq&fid=6
```

* View Profile of Current user
```
localhost/social-id/app.php?viewProfile
```

* View Profile by ID
```
localhost/social-id/app.php?viewProfileID&id=<id>
```

* Change visibility of a social account
```
localhost/social-id/app.php?changeVisible&sid=<sid>&visible=<0/1>
```