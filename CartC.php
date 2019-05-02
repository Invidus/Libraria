<?
class Cart
{
    /**
     * Данные корзины
     * 
     * @var array
     */
    protected $data = [];
    
    /**
     * Имя cookie с корзиной
     * 
     * @var string
     */
    protected $name = 'cart';
 
 
    public function __construct()
    {
        $this->decode();
    }
    
    /**
     * Добавление ID товара
     * 
     * @param integer $id
     * @return void
     */
    public function set($id)
    {
        if (!in_array($id, $this->data)) {
            $this->data[] = (int) $id;
        }
    }
    
    /**
     * Получение массива ID товаров
     * 
     * @return array
     */
    public function get()
    {
        return $this->data;
    }
    
    /**
     * Удаление товара из корзины
     * 
     * @param integer $id
     * @return void
     */
    public function delete($id)
    {
        if (false !== $key = array_search($id, $this->data)) {
            unset($this->data[$key]);
        }
    }
    
    /**
     * Получение корзины из cookie
     * 
     * @return void
     */
    protected function decode()
    {        
        $data = $_COOKIE[$this->name] ?? '';
        
        if ($data = json_decode($data, true)) {
            $this->data = array_filter($data, 'is_int');
        }
    }
    
    /**
     * Сохранение корзины в cookie
     * 
     * @return void
     */
    public function save()
    {
        setcookie($this->name, json_encode($this->data), time() + 30 * 86400);
    }
}


?>