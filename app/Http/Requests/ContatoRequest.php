<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()) {
          case "POST": //criaçao de uma novo registro
            return [
              'nome' => 'required|max:100',
              'email' => 'required|max:100|unique:contatos',
              'telefone' => 'required|max:15',
              'data_nascimento' => 'date_format:"d/m/Y"',
              'cpf' => 'required|max:11|unique:contatos',
              'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,gif',
            ];
            break;

          case "PUT": //atualização de um registro existente
            return [
              'nome' => 'required|max:100',
              'email' => 'required|max:100|unique:contatos,email,'.$this->id,
              'telefone' => 'required|max:15',
              'data_nascimento' => 'date_format:"d/m/Y"',
              'cpf' => 'required|max:11|unique:contatos,cpf',
              'avatar' => 'nullable|sometimes|image|mimes:jpg,jpeg,png,gif',
            ];
            break;

          default:break;
        }
      }

    public function messages()
      {
        return [
          'nome.required' => 'O campo nome é obrigatório',
          'email.required' => 'Informe um e-mail válido',
          'data_nascimento.required' => 'O campo data deve ser no formato DD/MM/AAAA',
          'cpf.required' => 'Informe um CPF válido',
        ];
      }
}
