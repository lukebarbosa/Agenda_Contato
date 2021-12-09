<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'telefone', 'data_nascimento', 'cpf', 'avatar'];

    public function getAvatarImageAttribute($value) {
      return $this->avatar == null ? asset('images/null.png') : asset($this->avatar);
    }
    public function getAvatarFilenameAttribute($value) {
      return substr($this->avatar, 30, strlen($this->avatar));
    }
    // formatando a data de Ano-Mes-Ddia para Dia-Mes-Ano
    public function getDataNascimentoAttribute($value) {
      return dateFormatDatabaseScreen($value, 'screen');
    }

    //Mutator
    // formatando a data de Dia-Mes-Ano para Ano-Mes-Ddia pra o banco de dados
    public function setDataNascimentoAttribute($value){
      $this->attributes['data_nascimento'] = dateFormatDatabaseScreen($value);

  }

  // fazendo a tratativa da imagem
  public function setAvatarAttribute($value){
    //prefix aleartorio para caso de upload com msm nome
      $filename = substr(md5(rand(100000, 999999)),0,5) .'_'.$value->getClientOriginalName();
      //criando uma pasta
      $filepath = 'public/uploads'.date('Y').'/'.date('m').'/';
      //verificando se o upload é válido
      if ($value->isValid()){
          $path = $value->storeAs($filepath, $filename); //salvando
      }
      $this->attributes['avatar'] = str_replace('public', 'storage', $filepath) . $filename;
  }
}

