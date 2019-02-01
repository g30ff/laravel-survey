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
[[https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/welcome.png|alt=WelcomeScreen]]

## Login Screen
[[https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/login.png|alt=LoginScreen]]

## Logged In Welcome Screen
[[https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/logged_in_welcome.png|alt=LoggedInWelcomeScreen]]

## Survey Selection Screen
[[https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/select_survey.png|alt=SurveySelectionScreen]]

## Survey Being Taken
[[https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/survey_taken.png|alt=SurveyBeingTaken]]

## Question Management Screen
[[https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/question_management.png|alt=QuestionManagementScreen]]

## Answers Management Screen
[[https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/answers_management.png|alt=AnswersManagementScreen]]

## Survey Response Page
[[https://github.com/g30ff/laravel-survey/blob/master/readme%20pics/survey_output.png|alt=SurveyResponsePage]]
