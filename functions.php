<?php

const USERS_FILE = 'users.json';

function showTableForm()
{
    $html = '
    <form action="http://localhost:8000?action=create" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Your name">
        <input type="text" name="phone" placeholder="+380631234567">
        <input type="text" name="age" placeholder="00">
        <input type="text" name="Sex" placeholder="M/F">
        <input type="text" name="salary" placeholder="Salary">
        <label for="departments">Choose a department:</label>
        <select name="departments" id="departments">
            <option value="Support">Support</option>
            <option value="DevOps">DevOps</option>
            <option value="Dealing">Dealing</option>
            <option value="Compliance">Compliance</option>
        </select> 
        <input type="submit" name="Submit">
    </form>
  ';

    echo $html;
}

function showContactBook()
{
    $html = '
    <table border="1">
    <thead>
        <th>Name</th>    
        <th>Phone</th>
        <th>Age</th>
        <th>Sex</th>
        <th>Salary</th>
        <th>Department</th>
    </thead>
    <tbody>';

    foreach (getContacts() as $contact) {
        $html .= "<tr><td>{$contact['name']}</td><td>{$contact['phone']}</td><td>{$contact['age']}</td><td>{$contact['sex']}</td><td>{$contact['salary']}</td><td>{$contact['departments']}</td></tr>";
    }

    $html .= '</tbody></table>';

    echo $html;
}

function getContacts(): array
{
    $jsonString = file_get_contents(USERS_FILE);

    return json_decode($jsonString, true) ?? [];
}

function createContact(string $name, string $phone, string $age, string $sex, string $salary, string $department) {
    $users = getContacts();
    $users[] = [
        'name' => $name,
        'phone' => $phone,
        'age' => $age,
        'sex' => $sex,
        'salary' => $salary,
        'departments' => $department
        ];
    writeUsersToFile($users);
}

function writeUsersToFile(array $users)
{
    $json = json_encode($users);

    file_put_contents(USERS_FILE, $json);
}