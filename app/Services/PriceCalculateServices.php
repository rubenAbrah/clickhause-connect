<?

namespace App\Services;

class PriceCalculateServices
{
    public function start(array $data, $method = 'minus'):int
    {
        if (method_exists($this, $method)) {
            return $this->$method($data['a'], $data['b']);
        }
        throw new \Exception('method not found',404);
    }
    protected function minus(int $a, int $b): int
    {
        return intval($a - $b);
    }
    protected function plus(int $a, int $b): int
    {
        return intval($a + $b);
    }
}
