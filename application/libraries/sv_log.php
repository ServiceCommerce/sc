<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Dinho
 * Date: 29/11/2017
 * Time: 23:26
 * V1.0
 */

class sv_log{
    public $title   = '';
    public $msg     = '';
    public $CodErro = '';


    public function set($tipo, $cod){
        $msg = explode('-', $cod);
        switch ($msg[0]){
            case 'Prod':
                $this->produtos($tipo, $cod);
                break;
            case 'Cate':
                $this->categorias($tipo, $cod);
                break;
            case 'Syst':
                $this->system($tipo, $cod);
                break;
            case 'Clie':
                $this->clientes($tipo, $cod);
                break;
            case 'Perm':
                $this->permissoes($tipo, $cod);
                break;
            case 'User':
                $this->usuarios($tipo, $cod);
                break;
            default:
                $this->title = 'Ops';
                $this->msg   = 'erro de classe desconhecida';
        }#End switch
    }#End switch

    public function get(){
        return array(
            'title'     => $this->title,
            'msg'       => $this->msg,
        );
    }

    private function produtos($tipo, $cod){
        if($tipo == 'success'){
            switch ($cod){
                case 'Prod-001':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Produto cadastrado com sucesso!';
                    break;

                case 'Prod-002':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Produto adicionado com sucesso! Cadastrar parametros de exibição';
                    break;

                case 'Prod-003':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Produto adicionado com sucesso!';
                    break;

                case 'Prod-004':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Produto excluido com sucesso!';
                    break;

                case 'Prod-005':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Todas as imagens foram gravadas com sucesso!';
                    break;

                case 'Prod-006':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Produto editado com sucesso!';
                    break;

                default:
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de sucesso desconhecido';
                    break;

            }#End switch $COD - SUCCESS
        }elseif($tipo == 'error'){
            switch ($cod){
                case 'Prod-10001':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para visualizar produtos.';
                    break;

                case 'Prod-10002':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para adicionar produtos.';
                    break;

                case 'Prod-10003':
                    $this->title    = 'Erro de consistência ';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você deve adicionar uma CATEGORIA antes de adicionar um produto.';
                    break;

                case 'Prod-10004':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para editar produtos.';
                    break;

                case 'Prod-10005':
                    $this->title    = 'Erro:';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Produto não encontrado.';
                    break;

                case 'Prod-10006':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para excluir produtos.';
                    break;

                case 'Prod-10007':
                    $this->title    = 'Erro:';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Erro ao tentar excluir produto.';
                    break;

                case 'Prod-10008':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para publicar no site.';
                    break;

                case 'Prod-10009':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Uma ou mais imagens não foram gravadas';
                    break;

                default:
                    $this->title    = 'Produtos!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de erro desconhecido';
                    break;
            }#End switch $COD ERROR

        }#End if
    }#End produtos

    private function categorias($tipo, $cod){
        if($tipo == 'success'){
            switch ($cod){
                case 'default':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = '';
                    break;

                case 'Cate-001':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Categoria adicionado com sucesso!';
                    break;

                case 'Cate-002':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Categoria editada com sucesso.';
                    break;

                case 'Cate-003':
                    $this->title    = 'Sucesso';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Categoria excluida com sucesso!';
                    break;

                default:
                    $this->title    = 'Categorias!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de sucesso desconhecido';
                    break;

            }#End switch $COD - SUCCESS
        }elseif($tipo == 'error'){
            switch ($cod){
                case 'default':
                    $this->title    = '';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = '';
                    break;

                case 'Cate-10001':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para adicionar Categorias.';
                    break;

                case 'Cate-10002':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Houve um erro ao adicionar categoria.';
                    break;

                case 'Cate-10003':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para editar Categorias.';
                    break;

                case 'Cate-10004':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Erro ao tentar editar categoria.';
                    break;

                case 'Cate-10005':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para visualizar Categorias.';
                    break;

                case 'Cate-10006':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para excluir categorias.';
                    break;

                case 'Cate-10007':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Erro ao tentar excluir a Categoria.';
                    break;

                case 'Cate-10008':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Categorias com produtos divulgados no site só poderão ser excluidos após migração de todos os produtos para nova categoria';
                    break;

                default:
                    $this->title    = 'Categorias!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de erro desconhecido';
                    break;
            }#End switch

        }
    }#End categorias

    private function system($tipo, $cod){
        if($tipo == 'success'){
            switch ($cod){
               case 'Syst-001':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Senha Alterada com sucesso!';
                    break;

                case 'Syst-002':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'As informações foram inseridas com sucesso.';
                    break;

                case 'Syst-003':
                    $this->title    = 'Sucesso';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'As informações foram alteradas com sucesso.';
                    break;

                case 'Syst-004':
                    $this->title    = 'Sucesso';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Sua foto foi alterada com sucesso!';
                    break;

                case 'Syst-005':
                    $this->title    = 'Sucesso';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'No próximo login seus dados serão alterados!';
                    break;

                case 'Syst-006':
                    $this->title    = 'Sucesso';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'As informações foram alteradas com sucesso.';
                    break;

                default:
                    $this->title    = 'System!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de sucesso desconhecido';
                    break;

            }#End switch $COD - SUCCESS
        }elseif($tipo == 'error'){
            switch ($cod){
               case 'Syst-10001':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Ocorreu um erro ao tentar alterar a senha!';
                    break;

                case 'Syst-10002':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Senhas não são iguais, tente novamente.';
                    break;

                case 'Syst-10003':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para efetuar backup.';
                    break;

                case 'Syst-10004':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para configurar emitente.';
                    break;

                case 'Syst-10005':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para configurar emitente.';
                    break;

                case 'Syst-10006':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para configurar emitente.';
                    break;

                case 'Syst-10007':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Houve um errro ao se conectar com o banco de dados, contate o suporte ou tente mais tarde';
                    break;
                case 'Syst-10008':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Campos obrigatórios não foram preenchidos.';
                    break;

                case 'Syst-10009':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Ocorreu um erro ao tentar inserir as informações.';
                    break;

                case 'Syst-10010':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para configurar emitente.';
                    break;

                case 'Syst-10011':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Campos obrigatórios não foram preenchidos.';
                    break;

                case 'Syst-10012':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Ocorreu um erro ao tentar alterar as informações.';
                    break;

                case 'Syst-10013':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para configurar emitente.';
                    break;

                case 'Syst-10014':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Ocorreu um erro ao tentar alterar a logomarca.';
                    break;

                case 'Syst-10015':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Ocorreu um erro ao tentar alterar as informações.';
                    break;

                case 'Syst-10016':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Não foi possivel subir a imagem para um servidor. Desculpe.';
                    break;

                default:
                    $this->title    = 'System!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de erro desconhecido';
                    break;
            }

        }
    }#End system

    private function clientes($tipo, $cod){
        if($tipo == 'success'){
            switch ($cod){
                case 'Clie-001':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Cliente adicionado com sucesso!';
                    break;

                case 'Clie-002':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Dados alterados com sucesso!';
                    break;

                case 'Clie-003':
                    $this->title    = 'Sucesso';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Cliente excluido com sucesso!';
                    break;

                default:
                    $this->title    = 'Clientes!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de sucesso desconhecido';
                    break;

            }#End switch $COD - SUCCESS
        }elseif($tipo == 'error'){
            switch ($cod){
                case 'Clie-10001':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para visualizar clientes.';
                    break;

                case 'Clie-10002':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para adicionar clientes.';
                    break;

                case 'Clie-10003':
                    $this->title    = 'Erroo';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Erro ao tentar adicionar cliente';
                    break;

                case 'Clie-10004':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Erro ao tentar cadastrar';
                    break;

                case 'Clie-10005':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para editar clientes.';
                    break;

                case 'Clie-10006':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Erro ao tentar alterar os dados, alguns campos pode não ter sido alterados';
                    break;

                case 'Clie-10007':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para visualizar clientes.';
                    break;
                case 'Clie-10008':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para excluir clientes.';
                    break;

                case 'Clie-10009':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Erro ao tentar excluir cliente.';
                    break;

                default:
                    $this->title    = 'Clientes!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de erro desconhecido';
                    break;
            }

        }
    }#End clientes

    private function permissoes($tipo, $cod){
        if($tipo == 'success'){
            switch ($cod){
                case 'Perm-001':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Permissão adicionada com sucesso!';
                    break;

                case 'Perm-002':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Permissão editada com sucesso!';
                    break;

                case 'Perm-003':
                    $this->title    = 'Sucesso';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Serviço excluido com sucesso!';
                    break;

                case 'Perm-004':
                    $this->title    = 'Sucesso';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Categoria desativada com sucesso!';
                    break;

                default:
                    $this->title    = 'Permissões!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de sucesso desconhecido';
                    break;

            }#End switch $COD - SUCCESS
        }elseif($tipo == 'error'){
            switch ($cod){
                case 'Perm-10001':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para configurar as permissões no sistema.';
                    break;

                case 'Perm-10002':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Erro ao tentar excluir serviço.';
                    break;

                case 'Perm-10003':
                    $this->title    = 'Erroo';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Não foi possivel desativa a Categoria';
                    break;

                case 'Perm-10004':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Nenhum parâmetro foi passado, entre em contato com o suporte';
                    break;

                default:
                    $this->title    = 'Permissões!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de erro desconhecido';
                    break;
            }

        }
    }#End permissoes

    private function usuarios($tipo, $cod){
        if($tipo == 'success'){
            switch ($cod){
                case 'User-001':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Usuário cadastrado com sucesso!';
                    break;

                case 'User-002':
                    $this->title    = 'Sucesso!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Usuário editado com sucesso!';
                    break;

                default:
                    $this->title    = 'Usuarios!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de sucesso desconhecido';
                    break;

            }#End switch $COD - SUCCESS
        }elseif($tipo == 'error'){
            switch ($cod){
                case 'User-10001':
                    $this->title    = 'Erro de permissão';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'Você não tem permissão para configurar os usuários.';
                    break;

                case 'User-10002':
                    $this->title    = 'Erro';
                    $this->CodErro  = 'e'.$cod;
                    $this->msg      = 'O usuário super admin não pode ser desativado!';
                    break;

                default:
                    $this->title    = 'Usuarios!';
                    $this->CodErro  = 's'.$cod;
                    $this->msg      = 'Log de erro desconhecido';
                    break;
            }

        }
    }#End usuarios
}#End CLASS