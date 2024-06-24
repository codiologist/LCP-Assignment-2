<?php

class Category {
    public static $incomeCategories = ['Salary', 'Business', 'Gift'];
    public static $expenseCategories = ['Food', 'Transport', 'Entertainment'];

    public static function getIncomeCategories() {
        return self::$incomeCategories;
    }

    public static function getExpenseCategories() {
        return self::$expenseCategories;
    }
}
?>
