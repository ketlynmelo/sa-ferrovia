console.log("Cadastro funcionando");

let form = document.getElementById('cadastro');

let dados = [];

form.addEventListener('submit', function (event) {

  event.preventDefault();

  const nome = document.getElementById('nome');
  const email = document.getElementById('email');
  const senha = document.getElementById('senha');
  const confirmarSenha = document.getElementById('confirmarSenha');
  const telefone = document.getElementById('telefone');
  const cpf = document.getElementById('cpf');
  const status = document.getElementById('status');

  const permissao = document.querySelector(
    'input[name="permissao"]:checked'
  );

  let valido = true;

  if (nome.value.trim() === '') {
    nome.classList.add('is-invalid');
    valido = false;
  } else {
    nome.classList.remove('is-invalid');
    nome.classList.add('is-valid');
  }

  if (!email.value.includes('@')) {
    email.classList.add('is-invalid');
    valido = false;
  } else {
    email.classList.remove('is-invalid');
    email.classList.add('is-valid');
  }

  if (senha.value.length < 6) {
    senha.classList.add('is-invalid');
    valido = false;
  } else {
    senha.classList.remove('is-invalid');
    senha.classList.add('is-valid');
  }

  if (confirmarSenha.value !== senha.value || confirmarSenha.value === '') {
    confirmarSenha.classList.add('is-invalid');
    valido = false;
  } else {
    confirmarSenha.classList.remove('is-invalid');
    confirmarSenha.classList.add('is-valid');
  }

  if (telefone.value.trim() === '') {
    telefone.classList.add('is-invalid');
    valido = false;
  } else {
    telefone.classList.remove('is-invalid');
    telefone.classList.add('is-valid');
  }

  if (cpf.value.trim().length < 11) {
    cpf.classList.add('is-invalid');
    valido = false;
  } else {
    cpf.classList.remove('is-invalid');
    cpf.classList.add('is-valid');
  }

  if (status.selectedIndex === 0) {
    status.classList.add('is-invalid');
    valido = false;
  } else {
    status.classList.remove('is-invalid');
    status.classList.add('is-valid');
  }

  if (!permissao) {
    document.getElementById('erroPermissao').innerText =
      'Selecione uma permissão.';
    valido = false;
  } else {
    document.getElementById('erroPermissao').innerText = '';
  }

  if (valido) {

    const usuario = {
      nome: nome.value,
      email: email.value,
      senha: senha.value,
      telefone: telefone.value,
      cpf: cpf.value,
      status: status.value,
      permissao: permissao.value
    };

    dados.push(usuario);

    console.log(dados);

    alert('Cadastro realizado com sucesso!');

    form.reset();

    document.querySelectorAll('.is-valid').forEach(campo => {
      campo.classList.remove('is-valid');
    });

  }

});
