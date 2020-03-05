<?php

namespace App\Models;

class Cliente extends Model {
	public function listar() {
		$query = 'SELECT id, nome FROM clientes';

		$query .=  $this->filter->getWhere();
        return $this->execute($query);
	}

	public function filtrar($filtros)
    {
        if (!empty($filtros['id'])) {
            $this->filter->addFilter(
            	'AND id = :id', array(':id' => $filtros['id'])
            );
        }

        if (!empty($filtros['nome'])) {
            $this->filter->addFilter(
            	'AND nome like :nome', [':nome' => '%' . $filtros['nome'] . '%']
            );
        }

        return $this;
    }
}