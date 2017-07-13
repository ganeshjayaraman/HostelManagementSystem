# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).


HOSTEL MANAGEMENT SYSTEM :
		This is Laravel based Application for Hostel Management System which is facilitated to meet needs of mananging Hostel needs 
		such as ALLOTING ROOMS and ALLOTING MESS etc.
		
		KNN (K Nearest Neighbour) Approach is used for alloting ROOMS in this app.
		
		KNN is Implemented using PYTHON PANDAS as Core Library.
		
		WORKFLOW :
			1. First create users using register form
			2. Create an admin. (I hardcoded here for simplicity)
			3. Get Room Allocation by clicking ROOM_ALLOCATE which will get the csv list of students and get the allotment of students and store it in DB. (Everything is done on a go.)
			4. Now for each individual can view their alloted ROOMS by logging into the app.
			5. They can also set the mess preference by dragging and dropping (Here i used numbers for simplicity).
			6. Once they have done it they will be allocated their mess based on seats available.