    <script>
        const form = document.getElementById('createTableForm');
        const addColBtn = document.createElement('button');
        addColBtn.textContent = 'Add Column';
        addColBtn.type = 'button';
        addColBtn.classList.add('addColBtn');

        addColBtn.addEventListener('click', function() {
            // const newColRow = document.createElement('div');
            // newColRow.classList.add('column-row');
            const newColRow = document.createElement('tr'); // Create a new table row
            newColRow.id = "column-row"; // Set the ID for the row


            // Individual input elements for column definition
            // const colNameLabel = document.createElement('label');
            // colNameLabel.textContent = 'Column Name:';
            const colNameCell = document.createElement('td');
            const colNameInput = document.createElement('input');
            colNameInput.type = 'text';
            colNameInput.name = 'colName[]';
            colNameInput.id = 'colName';
            colNameInput.required = true;
            colNameCell.appendChild(colNameInput);

            // const colTypeLabel = document.createElement('label');
            // colTypeLabel.textContent = 'Data Type:';
            const colTypeCell = document.createElement('td');
            const colTypeSelect = document.createElement('select');
            colTypeSelect.name = 'colType[]';
            colTypeSelect.required = true;

            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Select Data Type';
            colTypeSelect.appendChild(defaultOption);

            const dataTypes = ['varchar(255)', 'int', 'decimal', 'date'];
            for (const dataType of dataTypes) {
                const option = document.createElement('option');
                option.value = dataType;
                option.textContent = dataType.toUpperCase();
                colTypeSelect.appendChild(option);
            }
            colTypeCell.appendChild(colTypeSelect);

            // const colPropLabel = document.createElement('label');
            // colPropLabel.textContent = 'Properties:';
            const colPropCell = document.createElement('td');
            const colPropSelect = document.createElement('select');
            colPropSelect.name = 'colProp[]';
            colPropSelect.id = 'colProp';
            colPropSelect.required = true;
            colPropCell.appendChild(colPropSelect);

            const nullOption = document.createElement('option');
            nullOption.value = 'Null';
            nullOption.textContent = 'Null';
            colPropSelect.appendChild(nullOption);

            const notNullOption = document.createElement('option');
            notNullOption.value = 'Not Null';
            notNullOption.textContent = 'Not Null';
            colPropSelect.appendChild(notNullOption);

            const primaryKeyOption = document.createElement('option');
            primaryKeyOption.value = 'Not Null Auto Increment Primary key';
            primaryKeyOption.textContent = 'Primary Key';
            colPropSelect.appendChild(primaryKeyOption);

            const uniqueOption = document.createElement('option');
            uniqueOption.value = 'unique';
            uniqueOption.textContent = 'Unique';
            colPropSelect.appendChild(uniqueOption);

            // const colForeignKeyRefLabel = document.createElement('label');
            // colForeignKeyRefLabel.textContent = 'Foreign Key Reference (optional):';
            const colForeignCell = document.createElement('td');
            const colForeignKeyRefSelect = document.createElement('select');
            colForeignKeyRefSelect.name = 'colForeignKeyRef[]';
            colForeignKeyRefSelect.id = 'colForeignKeyRef';
            colForeignCell.appendChild(colForeignKeyRefSelect);

            const defaultNoFkOption = document.createElement('option');
            defaultNoFkOption.value = '';
            defaultNoFkOption.textContent = 'Select Table';
            colForeignKeyRefSelect.appendChild(defaultNoFkOption);

            const fetchedTables = <?php echo json_encode($tables); ?>;
            for (const table of fetchedTables){
                const noFkOption = document.createElement('option');
                noFkOption.value = table;
                noFkOption.textContent = table;
                colForeignKeyRefSelect.appendChild(noFkOption);
            }

            const colRemoveCell = document.createElement('td');
            const removeColBtn = document.createElement('button');
            removeColBtn.textContent = 'Remove';
            removeColBtn.type = 'button';
            removeColBtn.classList.add('removeColBtn');
            colRemoveCell.appendChild(removeColBtn);

            // Enforce only one primary key selection
            colPropSelect.addEventListener('change', function() {
                if (this.value === 'Not Null Auto Increment Primary key') {
                    const otherPKs = document.querySelectorAll('select[name="colProp[]"]');
                    for (const pk of otherPKs) {
                        if (pk !== this && pk.value === 'Not Null Auto Increment Primary key') {
                            pk.value = 'Not Null'; // Reset other primary key options
                        }
                    }
                }
            });

            // Disable foreign key selection for the primary key column
            colPropSelect.addEventListener('change', function() {
                colForeignKeyRefSelect.disabled = this.value === 'Not Null Auto Increment Primary key';
            });

            // newColRow.appendChild(colNameLabel);
            // newColRow.appendChild(colNameInput);
            // newColRow.appendChild(colTypeLabel);
            // newColRow.appendChild(colTypeSelect);
            // newColRow.appendChild(colPropLabel);
            // newColRow.appendChild(colPropSelect);
            // newColRow.appendChild(colForeignKeyRefLabel);
            // newColRow.appendChild(colForeignKeyRefSelect);
            // newColRow.appendChild(removeColBtn);

            newColRow.appendChild(colNameCell);
            newColRow.appendChild(colTypeCell);
            newColRow.appendChild(colPropCell);
            newColRow.appendChild(colForeignCell);
            newColRow.appendChild(colRemoveCell);

            document.getElementById('columnList').appendChild(newColRow);

            removeColBtn.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });

        form.appendChild(addColBtn);

        // Prevent form submission without JavaScript (optional)
        form.addEventListener('submit', function(event) {
            if (!window.confirm('Are you sure you want to create the table?')) {
                event.preventDefault();
            }
        });
    </script>