<?php
$I = new AcceptanceTester($scenario);
$I->wantTo('Create quizzes with specific languages');
$I->amOnPage('/dashboard');
$I->seeCurrentUrlEquals('/login');
$I->fillField('email', 'john.doe@gmail.com');
$I->fillField('password', 'secret');
$I->click('Sign in');
$I->seeCurrentUrlEquals('/dashboard');
$I->see('Create new...','button');
$I->click('Create new...');
$I->seeCurrentUrlEquals('/quizzes/create');
$I->dontSeeInDatabase('languages',[
    'language'=>'spanish'
]);
$I->click("Add new language");
$I->seeCurrentUrlEquals('/languages/create');
$I->fillField('language', 'spanish');
$I->click("Add new language");
$I->seeInDatabase('languages', [
    'language' => 'spanish',
]);
$I->seeCurrentUrlEquals('/quizzes/create');
$I->selectOption('form select[name=language]', 'Spanish');
$I->click('Select language');
$I->seeCurrentUrlEquals('/quizzes/1/questions');
$I->selectOption('form select[name=question_type]', 'Word translation');
$I->click('Add new question');
//$I->seeCurrentUrlEquals('/quizzes/1/questions/create?_token=RSg4xmZW4OPgfLXx3LivZ2SCnTrzRH5LXAGxpO8d&question_type=1');
$language=$id = $I->grabFromDatabase('languages', 'language', [
    'language' => 'spanish'
]);
$I->fillField('Word in '.$language, 'Hola');
$I->fillField('Answer in English', 'hello');
$I->click('Add new question');
$I->seeInDatabase('questions',[
  'id'=>1,
    'answer'=>'hello',
    'in_english'=>'Hola',
    'type'=>1
]);
$I->seeCurrentUrlEquals('/quizzes/1/questions');
$I->selectOption('form select[name=question_type]', 'Sentence translation');
$I->click('Add new question');
$I->fillField('Sentence in '.$language, 'ABC ABC ABC');
$I->fillField('Answer in English', 'ABC ABD ABD');
$I->click('Add new question');
$I->seeInDatabase('questions',[
    'id'=>2,
    'answer'=>'ABC ABD ABD',
    'in_english'=>'ABC ABC ABC',
    'type'=>2
]);
$I->seeCurrentUrlEquals('/quizzes/1/questions');
$I->selectOption('form select[name=question_type]', 'Multiple choice');
$I->click('Add new question');
$I->fillField('Task content in '.$language, 'ABC');
$I->fillField('answer A', 'A');
$I->fillField('answer B', 'B');
$I->fillField('answer C', 'C');
$I->fillField('answer D', 'D');
$I->selectOption('form select[name=answer]', 'Answer A');
$I->click('Add new question');
$I->seeInDatabase('questions',[
    'id'=>3,
    'answer'=>'A',
    'in_english'=>'ABC',
    'type'=>3
]);
$I->seeCurrentUrlEquals('/quizzes/1/questions');
$I->see('Edit','button');
$I->see('Delete','button');
$I->click('Edit');
$I->fillField('Word in: '.$language, 'abc');
$I->fillField('Answer in English', 'cba');
$I->click('Save changes...');
$I->seeInDatabase('questions',[
    'id'=>1,
    'answer'=>'cba',
    'in_english'=>'abc',
    'type'=>1
]);
$I->click('Delete');
$I->dontSeeInDatabase('questions',[
    'id'=>1,
    'answer'=>'cba',
    'in_english'=>'abc',
    'type'=>1
]);
$I->click('Finish quiz creation');
$I->seeCurrentUrlEquals('/dashboard');
$I->seeInDatabase('quizzes',[
    'id'=>1,
    'language_id'=>1,
    'user_id'=>1
]);
$I->click('Details');
$I->seeCurrentUrlEquals('/quizzes/1');
$I->see('Type of question');
$I->see('Word in '.$language);
$I->see('Answer');
$I->see('Is question correct?');
$I->click('Edit');
$I->seeCurrentUrlEquals('/quizzes/1/questions/2/edit');
$I->fillField('Word in: '.$language, 'abcgagagjsj');
$I->fillField('Answer in English', 'sbbsbsbbsbsbs');
$I->click('Save changes...');
$I->seeInDatabase('questions',[
    'id'=>2,
    'answer'=>'sbbsbsbbsbsbs',
    'in_english'=>'abcgagagjsj',
    'type'=>2
]);
$I->click('Delete');
$I->dontSeeInDatabase('questions',[
    'id'=>2,
    'answer'=>'abcgagagjsj',
    'in_english'=>'sbbsbsbbsbsbs',
    'type'=>2
]);
$I->selectOption('form select[name=question_type]','Word translation');
$I->click('Add new question');
$I->fillField('Word in '.$language, 'a');
$I->fillField('Answer in English', 'b');
$I->click('Add new question');
$I->seeInDatabase('questions',[
    'answer'=>'b',
    'in_english'=>'a',
    'type'=>1
]);
$I->click('Finish quiz creation');
$I->seeCurrentUrlEquals('/dashboard');
$I->click('Discuss');
$I->seeCurrentUrlEquals('/quizzes/1/comments');
$I->see('Discussion');
$I->click('Add new comment');
$I->fillField('title','a');
$I->fillField('text','a');
$I->click('Create');
$I->seeInDatabase('comments',[
    'quiz_id'=>1,
    'user_id'=>1,
    'title'=>'a',
    'text'=>'a'
]);
$I->see('Go to discussion');
$I->see('Edit');
$I->see('Delete');
$I->click('Edit');
$I->fillField('title','b');
$I->fillField('text','b');
$I->click('Edit');
$I->seeInDatabase('comments',[
    'quiz_id'=>1,
    'user_id'=>1,
    'title'=>'b',
    'text'=>'b'
]);
$I->click('Go to discussion');
$title=$I->grabFromDatabase('comments','title',[
    'id'=>1,
    'user_id'=>1,
    'quiz_id'=>1
]);
$user=$I->grabFromDatabase('users','email',[
    'id'=>1,
]);
$I->seeCurrentUrlEquals('/quizzes/1/comments/1/subcomments');
$I->see($title);
$I->see($user);
$I->click('Add answer');
$I->seeCurrentUrlEquals('/quizzes/1/comments/1/subcomments/create');
$I->fillField('title','ba');
$I->fillField('text','bc');
$I->click('Create');
$I->seeCurrentUrlEquals('/quizzes/1/comments/1/subcomments');
$I->seeInDatabase('subcomments',[
    'user_id'=>1,
    'title'=>'ba'
]);
$subcomment=$I->grabFromDatabase('subcomments','title',[
   'user_id'=>1,
   'title'=>'ba'
]);
$I->see($subcomment);
$I->click('Edit');
$I->fillField('title','bba');
$I->fillField('text','bbc');
$I->click('Edit');
$I->seeInDatabase('subcomments',[
    'user_id'=>1,
    'title'=>'bba',
    'text'=>'bbc'
]);
$I->seeCurrentUrlEquals('/quizzes/1/comments/1/subcomments');
$I->click('Delete');
$I->dontSeeInDatabase('subcomments',[
    'user_id'=>1,
    'title'=>'bba',
    'text'=>'bbc'
]);
$I->click('Go back');
$I->seeCurrentUrlEquals('/quizzes/1/comments');
$I->click('Go back');
$I->seeCurrentUrlEquals('/quizzes');









