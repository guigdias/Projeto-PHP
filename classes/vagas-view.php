<?php
class VagaViewInfo extends VagasInfo
{
    public function fetchNome($anunciante_id)
    {
        $VagaInfo = $this->getVagasInfo($anunciante_id);

        echo $VagaInfo["vaga_nome"];
    }

    public function fetchDescricao($anunciante_id)
    {
        $VagaInfo = $this->getVagasInfo($anunciante_id);

        echo $VagaInfo["vaga_descricao"];
    }
}
?>