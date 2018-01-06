public function validar_senha($senha = ''){

                $senha = trim($senha);

                $regex_lowercase = '/[a-z]/'; //letra minuscula
                $regex_uppercase = '/[A-Z]/'; //letra maiuscula
                $regex_number = '/[0-9]/'; //numero
                $regex_special = '/[!@#$%^&*()\-_=+{};:,<.>§~]/'; //caracter especial

                if(empty($senha)){

                    $this->form_validation->set_message('validar_senha', 'O campo é obrigatório');
                    return FALSE;
                }

                if(empty(preg_match_all($regex_lowercase, $senha) < 1)){

                    $this->form_validation->set_message('validar_senha', 'O campo deve ter pelo menos uma letra minuscula');
                    return FALSE;
                }

                if(empty(preg_match_all($regex_uppercase, $senha) < 1)){

                    $this->form_validation->set_message('validar_senha', 'O campo deve ter pelo menos uma letra maiuscula');
                    return FALSE;
                }

                if(empty(preg_match_all($regex_number, $senha) < 1)){

                    $this->form_validation->set_message('validar_senha', 'O campo deve ter pelo menos um número');
                    return FALSE;
                }

                if(empty(preg_match_all($regex_special, $senha) < 1)){

                    $this->form_validation->set_message('validar_senha', 'O campo deve ter pelo menos um caracter especial');
                    return FALSE;
                }


                if (strlen($senha) < 6)
                 {
                        $this->form_validation->set_message('validar_senha', 'O campo deve ter no mínimo 6 digitos' );
                        return FALSE;
                }

                return true;
        }