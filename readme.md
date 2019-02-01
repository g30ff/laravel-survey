# Survey App

The Survey Application allows for surveys to be created and taken by users.  The survey can have an arbitrary amount of questions, each of which can have an arbitrary amount of answers.  The surveys are in multiple choice format, where only one of the available answers can be selected. It has user registration and login for access control.  It is built using Laravel 5.4, using Vagrant, Homestead, PHP 7.1 and Ubuntu 16.04.1 LTS (GNU/Linux 4.4.0-51-generic x86_64).


## Existing Functionality

* The application is not completed yet.  Currently the functionality exists to:
* Register new users
* Log In to the portal
* Restrict access to pages when user is not authorized.
* Add, edit, delete questions
* Add, edit, delete answers.
* Associate or disassociate existing answers to questions.
* Add, edit, delete surveys.
* Associate or disassociate questions to a survey. 
* Capture user info, and survey responses to database.
* Display user responses to surveys taken.
* Unit tests.

## Needs Completing

* Additional unit tests.
* Code refactoring where needed.

## Links

* http://homestead.test/  -  Homepage.
* http://homestead.test/survey  -  Survey selection homepage.
* http://homestead.test/admin/surveys  -  Survey administration area.
* http://homestead.test/admin/questions  -  Questions administration area.
* http://homestead.test/admin/answers  -  Answers administration area.


# Screenshots
## Welcome Screen
![WelcomeScreen](https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/welcome.png)
## Login Screen
![LoginScreen](https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/login.png)

## Logged In Welcome Screen
![LoggedInWelcomeScreenage](https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/logged_in_welcome.png)

## Survey Selection Screen
![SurveySelectionScreen](https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/select_survey.png)

## Survey Being Taken
![SurveyBeingTaken](https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/survey_taken.png)

## Question Management Screen
![QuestionManagementScreen](https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/question_management.png)

## Answers Management Screen
![AnswersManagementScreen](https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/answers_management.png)
## Survey Response Page
![SurveyResponsePage](https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/survey_output.png)