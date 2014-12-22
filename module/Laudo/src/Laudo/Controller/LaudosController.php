<?php

namespace Laudo\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class LaudosController extends AbstractActionController {

    // GET /laudos
    public function indexAction() {
        
    }

    // GET /laudos/novo
    public function novoAction() {
        
    }

    // POST /laudos/adicionar
    public function adicionarAction() {
        // obtém a requisição
        $request = $this->getRequest();

        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $postData = $request->getPost()->toArray();
            $formularioValido = true;

            // verifica se o formulário segue a validação proposta
            if ($formularioValido) {
                // aqui vai a lógica para adicionar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela adição
                // 2 - inserir dados no banco pelo model
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Laudo foi incluído");

                // redirecionar para action index no controller laudos
                return $this->redirect()->toRoute('laudos');
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao incluir laudo");

                // redirecionar para action novo no controllers laudos
                return $this->redirect()->toRoute('laudos', array('action' => 'novo'));
            }
        }
    }

    // GET /laudos/detalhes/id
    public function detalhesAction() {
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para laudos
        if (!$id) {
            // adicionar mensagem
            $this->flashMessenger()->addMessage("Laudo não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('laudos');
        }

        // aqui vai a lógica para pegar os dados referente ao laudo
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse laudo encontrado
        // formulário com dados preenchidos
        $form = array(
            'ci' => '009754-1988/2014',
            "procedimento" => "902-00123/2014",
            "oc" => "5977/14"
//            "data_criacao" => "02/03/2013",
//            "data_atualizacao" => "02/03/2013",
        );

        // dados eviados para detalhes.phtml
        return array('id' => $id, 'form' => $form);
    }

    // GET /laudos/editar/id
    public function editarAction() {
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para laudos
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addMessage("Laudo não encotrado");

            // redirecionar para action index
            return $this->redirect()->toRoute('laudos');
        }

        // aqui vai a lógica para pegar os dados referente ao laudo
        // 1 - solicitar serviço para pegar o model responsável pelo find
        // 2 - solicitar form com dados desse laudo encontrado
        // formulário com dados preenchidos
        $form = array(
            'ci' => '009754-1988/2014',
            "procedimento" => "902-00123/2014",
            "oc" => "5977/14"
//            "data_criacao" => "02/03/2013",
//            "data_atualizacao" => "02/03/2013",
        );

        // dados eviados para editar.phtml
        return array('id' => $id, 'form' => $form);
    }

    // PUT /laudos/editar/id
    public function atualizarAction() {
        // obtém a requisição
        $request = $this->getRequest();

        // verifica se a requisição é do tipo post
        if ($request->isPost()) {
            // obter e armazenar valores do post
            $postData = $request->getPost()->toArray();
            $formularioValido = true;

            // verifica se o formulário segue a validação proposta
            if ($formularioValido) {
                // aqui vai a lógica para editar os dados à tabela no banco
                // 1 - solicitar serviço para pegar o model responsável pela atualização
                // 2 - editar dados no banco pelo model
                // adicionar mensagem de sucesso
                $this->flashMessenger()->addSuccessMessage("Laudo foi atualizado");

                // redirecionar para action detalhes
                return $this->redirect()->toRoute('laudos', array("action" => "detalhes", "id" => $postData['id'],));
            } else {
                // adicionar mensagem de erro
                $this->flashMessenger()->addErrorMessage("Erro ao atualizar laudo");

                // redirecionar para action editar
                return $this->redirect()->toRoute('laudos', array('action' => 'editar', "id" => $postData['id'],));
            }
        }
    }

    // DELETE /laudos/deletar/id
    public function deletarAction() {
        // filtra id passsado pela url
        $id = (int) $this->params()->fromRoute('id', 0);

        // se id = 0 ou não informado redirecione para laudos
        if (!$id) {
            // adicionar mensagem de erro
            $this->flashMessenger()->addMessage("Laudo não foi encotrado");
        } else {
            // aqui vai a lógica para deletar o laudo no banco
            // 1 - solicitar serviço para pegar o model responsável pelo delete
            // 2 - deleta laudo
            // adicionar mensagem de sucesso
            $this->flashMessenger()->addSuccessMessage("Laudo $id foi excluído");
        }

        // redirecionar para action index
        return $this->redirect()->toRoute('laudos');
    }

}
