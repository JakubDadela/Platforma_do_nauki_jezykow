<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Create quizzes with specific languages');
$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/login');
$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');
$I->click('Sign in');
$I->seeCurrentUrlEquals('/dashboard');
$I->see('Admin');
$I->see('Expert');
$I->dontSee('Edit your quizzes');
$I->see('Creator Name');
$I->see('Language');
$I->dontSeeInDatabase('languages', [
    'language' => 'english',
]);
$I->click('Create new...');
$I->seeCurrentUrlEquals('/quizzes/create');
$I->click("Add new language");
$I->seeCurrentUrlEquals('/languages/create');
$I->fillField('language', 'english');
$I->click("Add new language");
$I->seeInDatabase('languages', [
      'language' => 'english',
]);
$I->seeCurrentUrlEquals('/quizzes/create');

