<?php

class DataHandler {
    private $incomeFile = 'incomes.json';
    private $expenseFile = 'expenses.json';

    public function __construct() {
        if (!file_exists($this->incomeFile)) {
            file_put_contents($this->incomeFile, json_encode([]));
        }
        if (!file_exists($this->expenseFile)) {
            file_put_contents($this->expenseFile, json_encode([]));
        }
    }

    public function saveIncome($income) {
        $incomes = $this->getIncomes();
        $incomes[] = $income;
        file_put_contents($this->incomeFile, json_encode($incomes));
    }

    public function saveExpense($expense) {
        $expenses = $this->getExpenses();
        $expenses[] = $expense;
        file_put_contents($this->expenseFile, json_encode($expenses));
    }

    public function getIncomes() {
        return json_decode(file_get_contents($this->incomeFile), true);
    }

    public function getExpenses() {
        return json_decode(file_get_contents($this->expenseFile), true);
    }
}
?>
