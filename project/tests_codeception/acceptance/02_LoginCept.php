<?php

$I = new AcceptanceTester($scenario);
$I->wantTo('login with existing user');

$I->amOnPage('/dashboard');

$I->seeCurrentUrlEquals('/login');

$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');

$I->click('Sign in');

$I->seeCurrentUrlEquals('/dashboard');

$I->dontSee('Edit your quizzes');
$I->see('Creator Name');
$I->see('Language');
//$I->see("You're logged in!");
