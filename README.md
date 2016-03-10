# Consulta Município
Um webservice em php que permite passar como parâmetro a cidade e a uf e ele te retorna CEP, Endereço, Cidade e UF

# Instalação
``$
git clone https://github.com/cezarpretto/consulta-municipio.git
``

# Fazendo consultas

``
http://localhost/consulta-municipio/?cidade=sao-paulo&uf=sp&formato=json
``

Parâmetros disponíveis:

<table>
  <thead>
    <tr>
      <th>Parâmetro</th>
      <th>Observação</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>cidade</td>
      <td>O nome da cidade que deseja pesquisar. Caso a cidade possua mais de uma palavra é necessário remover os espaços e separar por hífem. Exemplo: cidade=nova-xavantina </td>
    </tr>
    <tr>
      <td>uf</td>
      <td>A UF do estado que deseja pesquisar</td>
    </tr>
    <tr>
      <td>formato</td>
      <td>O formato que deseja no retorno dos dados. Esses podem ser json ou xml.</td>
    </tr>
  </tbody>
</table>
