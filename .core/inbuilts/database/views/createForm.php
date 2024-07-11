<style>

    /* Basic table styles */
table {
    width: 100%;
    max-width: 1200px;
    border-collapse: collapse;
    margin-bottom: 20px; /* Optional: Adjust spacing as needed */
    font-family: Arial, sans-serif; /* Optional: Use a preferred font */
}

/* Table header styles */
th {
    background-color: #f2f2f2;
    color: #333;
    font-weight: bold;
    padding: 8px;
    text-align: left;
    border: 1px solid #ccc;
}

/* Table row styles */
td {
    padding: 4px 8px;
    border: 1px solid #ccc;
}

/* Alternating row background color */
tr:nth-child(even) {
    background-color: rgb(230,230,230);
}
tr:nth-child(odd) {
    background-color: rgb(240,240,240);
}

tr {
    border-left: 1px solid black;
    border-right: 1px solid black;
}

/* Hover effect on rows */
tr:hover {
    background-color: #e5e5e5;
}

input, select {
    width: 100%;
    padding: .2rem;
    border: none;
    border-bottom: 1px solid rgba(0,0,0,0.3);
    outline: none;
}

input {
    width: 99%;
    max-width: 700px;
}

</style>

<div>
    <form id="createTableForm" method="post">
        <label for="tableName">Table Name:</label>
        <input class="mb-5 p-2 rounded" type="text" name="tableName" id="tableName" required><br>
        <table class="w-full border" id="columnList">
            <tr>
                <th class="text-left p-2 border">Column Name</th>
                <th class="text-left p-2 border">Data Type</th>
                <th class="text-left p-2 border">Properties</th>
                <th class="text-left p-2 border">Foregin Key Reference</th>
                <th class="text-left p-2 border"></th>
            </tr>
             
        </table>
        <br>
        <button type="submit">Create Table</button>
    </form>
</div>



<?php

require_once ROOT.'/.core/inbuilts/database/views/script.php';

?>

<!-- <tr id="column-row">
    <td>
        <input type="text" name="colName[]" id="colName" required="">
    </td>
    <td>
        <select name="colType[]" required="">
            <option value="">Select Data Type</option>
            <option value="varchar(255)">VARCHAR(255)</option>
            <option value="int">INT</option>
            <option value="decimal">DECIMAL</option>
            <option value="date">DATE</option>
        </select>
    </td>
    ...
    <td>
        <button type="button" class="removeColBtn">Remove</button>
    </td>
</tr> -->

<!-- <div class="column-row">
    <label>Column Name:</label>
    <label>Data Type:</label>
    
    <label>Properties:</label>
    <select name="colProp[]" id="colProp" required="">
        <option value="Null">Null</option>
        <option value="Not Null">Not Null</option>
        <option value="Not Null Auto Increment Primary key">Primary Key</option><option value="unique">Unique</option></select><label>Foreign Key Reference (optional):</label><select name="colForeignKeyRef[]" id="colForeignKeyRef"><option value="">Select Table</option><option value="users">users</option></select>
        </div> -->