angular.module("gerenciadorTarefas").controller("tarefasCtrl", function ($scope, tarefasService){

  var carregarTarefas = function () {
    tarefasService.carregarTarefas().success(function (data) {
      $scope.tarefas = data;
      console.log('carregar');
    });
  };

  $scope.adicionarTarefa = function () {
      tarefasService.adicionarTarefa($scope.tarefa).success(function (data) {
        console.log('success');
        carregarTarefas();
        delete $scope.tarefa;
      });
  };

  $scope.deletarTarefa = function (_tarefa) {
    tarefasService.deletarTarefa(_tarefa).success(function (data) {
        carregarTarefas();
    });
  };

  carregarTarefas();

});
