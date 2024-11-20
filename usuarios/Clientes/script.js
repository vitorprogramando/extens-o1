document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('userForm');
    const search = document.getElementById('search');
    const userTable = document.getElementById('userTable').getElementsByTagName('tbody')[0];
    let clientes = [];

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(form);
        const id = formData.get('id');
        const method = id ? 'update' : 'create';

        fetch(`${method}.php`, {
            method: 'POST',
            body: formData
        }).then(response => response.text())
          .then(() => {
              form.reset();
              loadclientes();
          });
    });

    search.addEventListener('input', function() {
        loadclientes(search.value);
    });

    userTable.addEventListener('click', function(e) {
        if (e.target.classList.contains('edit')) {
            const userId = e.target.dataset.id;
            const user = clientes.find(u => u.id == userId);
            document.getElementById('userId').value = user.id;
            document.getElementById('name1').value = user.name;
            document.getElementById('email1').value = user.email;
            document.getElementById('phone1').value = user.phone;
            document.getElementById('name2').value = user.name2;
            document.getElementById('email2').value = user.email2;
            document.getElementById('phone2').value = user.phone2;
            document.getElementById('address').value = user.address;
            document.getElementById('startDate').value = user.startDate;
            document.getElementById('endDate').value = user.endDate;
            document.getElementById('observations').value = user.observations;
        } else if (e.target.classList.contains('delete')) {
            const userId = e.target.dataset.id;
            if (confirm('Tem certeza que deseja deletar o cliente?')) {
                fetch('delete.php', {
                    method: 'POST',
                    body: new URLSearchParams({ id: userId })
                }).then(() => loadclientes());
            }
        }
    });

    function loadclientes(query = '') {
        fetch(`read.php?search=${query}`)
            .then(response => response.json())
            .then(data => {
                clientes = data;
                userTable.innerHTML = clientes.map(user => `
                    <tr>
                        <td>${user.id}</td>
                        <td>${user.name}</td>
                        <td>${user.email}</td>
                        <td>${user.phone}</td>
                        <td>${user.name2}</td>
                        <td>${user.email2}</td>
                        <td>${user.phone2}</td>
                        <td>${user.address}</td>
                        <td>${user.startDate}</td>
                        <td>${user.endDate}</td>
                        <td>${user.observations}</td>
                        <td>
                            <button class="edit" title="Editar" data-id="${user.id}">Editar <ion-icon name="pencil-outline"></ion-icon></button>
                            <button class="delete" title="Excluir" data-id="${user.id}">Excluir <ion-icon name="trash-outline"></ion-icon></button>
                        </td>
                    </tr>
                `).join('');
            });
    }

    loadclientes();
});
