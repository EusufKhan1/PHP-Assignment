
//Task 3: Encapsulation**
//Design a class to manage employee data, demonstrating encapsulation by setting and getting employee salaries securely.

<?php

class Employee {
    private $name;
    private $position;
    private $salary;

    public function __construct($name, $position, $salary) {
        $this->name = $name;
        $this->position = $position;
        $this->setSalary($salary);
    }

    public function getName() {
        return $this->name;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function setSalary($salary) {
        if ($salary >= 0) {
            $this->salary = $salary;
        } else {
            throw new Exception("Salary cannot be negative.");
        }
    }

    public function giveRaise($amount) {
        if ($amount > 0) {
            $this->salary += $amount;
        } else {
            throw new Exception("Raise amount must be positive.");
        }
    }

    public function displayEmployeeDetails() {
        echo "Employee Name: " . $this->getName() . "\n";
        echo "Position: " . $this->getPosition() . "\n";
        echo "Salary: $" . $this->getSalary() . "\n";
    }
}


try {
    $employee = new Employee("John Doe", "Software Engineer", 50000);

    $employee->displayEmployeeDetails();

    $employee->giveRaise(5000);

    echo "\nAfter Raise:\n";
    $employee->displayEmployeeDetails();

    $employee->setSalary(-2000);

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
