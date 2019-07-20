<?php
class Find
{
    private $query;

    private $data;

    public function __construct()
    {
        $a = file_get_contents("http://" . $_SERVER['HTTP_HOST'] . "/Model/ApiEndPoint.php");
        $this->data = json_decode($a, true);
    }

    /**
     * @return mixed
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * @param mixed $query
     */
    public function setQuery($query): void
    {
        $this->query = $query;
    }

    public function findByName()
    {
        $this->setQuery($_GET['req']);
        foreach ($this->data as $item)
        {
            foreach ($item['data'] as $ite) {
                foreach ($ite['products'] as $it)
                {

                    if ($this->getQuery()===$it['product_name'])
                    {
                        return $it;
                    }
                }
            }
        }
    }
    public function findById()
    {
        $this->setQuery((int)$_GET['q']);
        foreach ($this->data as $item)
        {
            foreach ($item['data'] as $ite) {
                foreach ($ite['products'] as $it)
                {
                    if ($this->getQuery()===$it['id'])
                    {
                        return $it;
                    }
                }
            }
        }
    }

}
