<!-- resources/views/endpoints.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Rotas da API</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding: 2rem;
      background: #f9f9f9;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }
    .container {
      width: 100%;
      max-width: 800px;    /* largura máxima */
      background: #fff;
      padding: 1rem 2rem;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 4px;
    }
    h1 {
      text-align: center;
      font-size: 1.5rem;   /* tamanho reduzido */
      margin-bottom: 1rem;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 1rem;
    }
    th, td {
      padding: 0.5rem 0.75rem;  /* padding reduzido */
      border-bottom: 1px solid #eee;
      text-align: left;
      font-size: 0.9rem;        /* fonte menor */
    }
    th {
      background: #f0f0f0;
      font-weight: 600;
    }
    tr:hover {
      background: #f5f5f5;
    }
    code {
      background: #eef;
      padding: 0.15rem 0.3rem;
      border-radius: 3px;
      font-size: 0.85em;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Rotas Disponíveis</h1>
    <table>
      <thead>
        <tr>
          <th>Métodos</th>
          <th>URI</th>
          <th>Nome</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>
        @foreach($endpoints as $route)
        <tr>
          <td>{{ implode(', ', $route['methods']) }}</td>
          <td><code>/{{ $route['uri'] }}</code></td>
          <td>{{ $route['name'] ?: '—' }}</td>
          <td>{{ $route['action'] }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
