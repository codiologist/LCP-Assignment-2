<?php

require 'data-handler.php';
require 'income.php';
require 'expense.php';
require 'category.php';

$dataHandler = new DataHandler();

function showMenu() {
    echo "1. Add income\n";
    echo "2. Add expense\n";
    echo "3. View incomes\n";
    echo "4. View expenses\n";
    echo "5. View savings\n";
    echo "6. View categories\n";
    echo "Enter your option: ";
}

while (true) {
    showMenu();
    $option = trim(fgets(STDIN));

    switch ($option) {
        case 1:
            echo "Enter income amount: ";
            $amount = trim(fgets(STDIN));
            echo "Enter income category (" . implode(", ", Category::getIncomeCategories()) . "): ";
            $category = trim(fgets(STDIN));
            $income = new Income($amount, $category);
            $dataHandler->saveIncome($income);
            echo "Income added successfully.\n";
            break;
        case 2:
            echo "Enter expense amount: ";
            $amount = trim(fgets(STDIN));
            echo "Enter expense category (" . implode(", ", Category::getExpenseCategories()) . "): ";
            $category = trim(fgets(STDIN));
            $expense = new Expense($amount, $category);
            $dataHandler->saveExpense($expense);
            echo "Expense added successfully.\n";
            break;
        case 3:
            $incomes = $dataHandler->getIncomes();
            echo "Incomes:\n";
            foreach ($incomes as $income) {
                echo "Amount: {$income['amount']}, Category: {$income['category']}\n";
            }
            break;
        case 4:
            $expenses = $dataHandler->getExpenses();
            echo "Expenses:\n";
            foreach ($expenses as $expense) {
                echo "Amount: {$expense['amount']}, Category: {$expense['category']}\n";
            }
            break;
        case 5:
            $incomes = $dataHandler->getIncomes();
            $expenses = $dataHandler->getExpenses();
            $totalIncome = array_sum(array_column($incomes, 'amount'));
            $totalExpense = array_sum(array_column($expenses, 'amount'));
            $savings = $totalIncome - $totalExpense;
            echo "Total Savings: $savings\n";
            break;
        case 6:
            echo "Income Categories: " . implode(", ", Category::getIncomeCategories()) . "\n";
            echo "Expense Categories: " . implode(", ", Category::getExpenseCategories()) . "\n";
            break;
        default:
            echo "Invalid option. Please try again.\n";
            break;
    }
}
?>
