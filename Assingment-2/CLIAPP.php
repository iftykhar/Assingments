<?php
require_once './stricttype.php';

class CLIAPP{
    
    private FinanceManeger $financeManager;

    private const ADD_INCOME = 1;
    private const ADD_EXPENSE = 2;
    private const VIEW_INCOME = 3;
    private const VIEW_EXPENSE = 4;
    private const VIEW_SAVINGS = 5;
    private const VIEW_CATEGORIES = 6;
    private const EXIT_APP = 7;

    private array $options = [

        self::ADD_INCOME => 'add income',
        self::ADD_EXPENSE => 'add expense',
        self::VIEW_INCOME => 'view income',
        self::VIEW_EXPENSE => 'view expense',
        self::VIEW_SAVINGS => 'view savings',
        self::VIEW_CATEGORIES => 'view categories',
        self::EXIT_APP => 'exit',
    ];

    public function __construct(){
        $this->financeManager = new FinanceManeger(new FileStorage());
    }

    public function run(): void{

        while(true){

            foreach($this->options as $option => $lable){

                printf("%d. %s\n", $option,$lable);
            }
            
            $choice = intval(readline("Enter Option: "));

            switch($choice){

                case self::ADD_INCOME;
                    $amount = (float)trim(readline("Enter Income amount: "));
                    $category = trim(readline("Enter Income Category: "));
                    $this->financeManager->addIncome($amount, $category);
                    break;
                case self::ADD_EXPENSE;
                    $amount = (float) trim(readline("Enter Expense amount: "));
                    $category = trim(readline("Enter Expense Category: "));
                    $this->financeManager->addExpense($amount, $category);
                    break;
                    case self::VIEW_INCOME:
                        $this->financeManager->showIncomes();
                        break;
                    case self::VIEW_EXPENSE:
                        $this->financeManager->showExpenses();
                        break;
                    case self::VIEW_SAVINGS:
                        $this->financeManager->showSavings();
                        break;
                    case self::VIEW_CATEGORIES:
                        $this->financeManager->showCategories();
                        break;
                    case self::EXIT_APP:
                        return;
                    default:
                        echo "invalide option.\n";
                        break; 
            }
        }
    }
}