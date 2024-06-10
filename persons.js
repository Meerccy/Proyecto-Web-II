$(document).ready(function() {
    // Load persons
    $.ajax({
        url: 'get_persons.php',
        type: 'GET',
        dataType: 'json',
        success: function(persons) {
            var personList = $('#personList');
            persons.forEach(function(person) {
                var row = `<tr>
                            <td>${person.id}</td>
                            <td>${person.names}</td>
                            <td>${person.surname}</td>
                            <td>${person.secondSurname}</td>
                            <td>${person.ci}</td>
                            <td>${person.birthdate}</td>
                            <td>${person.gender}</td>
                            <td>${person.status}</td>
                            <td>${person.registerDate}</td>
                            <td>${person.lastUpdate}</td>
                            <td>${person.userId}</td>
                            <td><button class="btn btn-primary btn-sm edit-btn" data-id="${person.id}">Edit</button></td>
                           </tr>`;
                personList.append(row);
            });

            // Attach click event for edit buttons
            $('.edit-btn').click(function() {
                var personId = $(this).data('id');
                $.ajax({
                    url: 'get_person.php',
                    type: 'GET',
                    data: { id: personId },
                    dataType: 'json',
                    success: function(person) {
                        $('#personId').val(person.id);
                        $('#personNames').val(person.names);
                        $('#personSurname').val(person.surname);
                        $('#personSecondSurname').val(person.secondSurname);
                        $('#personCI').val(person.ci);
                        $('#personBirthdate').val(person.birthdate);
                        $('#personGender').val(person.gender);
                        $('#personStatus').val(person.status);
                    },
                    error: function(error) {
                        console.log('Error fetching person data:', error);
                    }
                });
            });
        },
        error: function(error) {
            console.log('Error fetching data:', error);
        }
    });

    // Add/Edit person
    $('#personForm').submit(function(e) {
        e.preventDefault();

        var personId = $('#personId').val();
        var personNames = $('#personNames').val();
        var personSurname = $('#personSurname').val();
        var personSecondSurname = $('#personSecondSurname').val();
        var personCI = $('#personCI').val();
        var personBirthdate = $('#personBirthdate').val();
        var personGender = $('#personGender').val();
        var personStatus = $('#personStatus').val();

        $.ajax({
            url: personId ? 'update_person.php' : 'add_person.php',
            type: 'POST',
            data: {
                id: personId,
                names: personNames,
                surname: personSurname,
                secondSurname: personSecondSurname,
                ci: personCI,
                birthdate: personBirthdate,
                gender: personGender,
                status: personStatus
            },
            success: function(response) {
                alert('Person saved successfully');
                location.reload();
            },
            error: function(error) {
                console.log('Error saving person:', error);
            }
        });
    });
});
