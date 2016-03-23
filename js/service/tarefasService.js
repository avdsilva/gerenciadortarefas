angular.module("gerenciadorTarefas").factory("tarefasService", function ($http, config) {

  $http.defaults.headers.common['Accept'] = 'application/json';

  var _carregarTarefas = function () {
    return $http.get(config.baseUrl + "/tarefas");
  };

  var _adicionarTarefa = function (_tarefa) {
    return $http.post(config.baseUrl + "/tarefas", _tarefa);
  };

  var _deletarTarefa = function (_tarefa) {
    return $http.delete(config.baseUrl + "/tarefas", _tarefa, {headers : {'Access-Control-Allow-Methods' : '*'}});
  };

  return {
    carregarTarefas: _carregarTarefas,
    adicionarTarefa: _adicionarTarefa,
    deletarTarefa: _deletarTarefa
  }

});
