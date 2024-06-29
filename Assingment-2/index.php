#! /usr/bin/env php
<?php

require_once './TransactionType.php';
require_once './Model.php';
require_once './Category.php';
require_once './IncomeCategory.php';
require_once './ExpenseCategory.php';
require_once './Transaction.php';
require_once './FinanceManeger.php';
require_once './Income.php';
require_once './Expense.php';
require_once './Storage.php';
require_once './Filestorage.php';

require_once './CLIAPP.php';

$cliApp = new CLIAPP();
$cliApp->run();