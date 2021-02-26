<?php
$I = new AcceptanceTester($scenario);
$I->haveInDatabase('languages',[
    'language'=>'spanish',
]);
$I->haveInDatabase('quizzes',[
    'id'=>1,
    'user_id'=>1,
    'language_id'=>1,
    'finished'=>1
]);
$I->haveInDatabase('questions',[
    'quiz_id'=>1,
    'answer'=>'hello',
    'in_english'=>'Hola',
    'is_correct'=>true,
    'type'=>1
]);
$I->haveInDatabase('questions',[
    'quiz_id'=>1,
    'answer'=>'hello Jacob',
    'in_english'=>'Hola Jacob',
    'is_correct'=>true,
    'type'=>2
]);
//$I->haveInDatabase('solutions',[
//    'question_id'=>2,
//    'answer'=>'hello Jacob',
//    'user_id'=>1
//]);
//$I->haveInDatabase('solutions',[
//    'question_id'=>1,
//    'answer'=>'hello',
//    'user_id'=>1
//]);
$I->seeInDatabase('languages',[
    'language'=>'spanish',
]);
$I->seeInDatabase('quizzes',[
    'id'=>1,
    'user_id'=>1,
    'language_id'=>1,
]);
$I->seeInDatabase('questions',[
    'quiz_id'=>1,
    'answer'=>'hello',
    'in_english'=>'Hola',
    'is_correct'=>true,
    'type'=>1
]);
$I->seeInDatabase('questions',[
    'quiz_id'=>1,
    'answer'=>'hello Jacob',
    'in_english'=>'Hola Jacob',
    'is_correct'=>true,
    'type'=>2
]);
$I->seeInDatabase(
    'users',[
        'id'=>1,
        'email'=>'john.doe@gmail.com'
    ]
);
$I->seeInDatabase(
    'users',[
        'id'=>2,
        'email'=>'alfons@gmail.com'
    ]
);

$I->wantTo('Create quizzes with specific languages');
$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/login');
$I->fillField('email', 'alfons@gmail.com');
$I->fillField('password', 'pimp');
$I->click('Sign in');
$I->seeCurrentUrlEquals('/dashboard');
$I->dontSee('Admin');
$I->dontSee('Expert');
$I->amOnPage('/quizzes');
$I->seeCurrentUrlEquals('/quizzes');
$I->seeInDatabase('languages',[
    'language'=>'spanish',
]);
$I->seeInDatabase('quizzes',[
    'id'=>1,
    'user_id'=>1,
    'language_id'=>1,
]);
$I->seeInDatabase('questions',[
    'quiz_id'=>1,
    'answer'=>'hello',
    'in_english'=>'Hola',
    'is_correct'=>true,
    'type'=>1
]);
$I->seeInDatabase('questions',[
    'quiz_id'=>1,
    'answer'=>'hello Jacob',
    'in_english'=>'Hola Jacob',
    'is_correct'=>true,
    'type'=>2
]);
$I->see('Creator');
$I->see('Language');
$I->see('Solve');
$I->click('Solve');
$I->seeCurrentUrlEquals('/quizzes/1/solutions/create');
$I->see('Translate word to English');
$I->see('Translate sentence to English');
$I->fillField('Translate sentence to English','hello Jacob');
$I->fillField('Translate word to English','h');
$I->click('Sumbit answers to the quiz');
//$I->seeInDatabase('solutions',[
//    'answer'=>'Hola Jacob'
//]);
$I->seeCurrentUrlEquals('/quizzes/1/solutions');
//$I->see('Quiz nr 1 results.');
//
