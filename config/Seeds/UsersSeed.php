<?php
declare(strict_types=1);

use Migrations\AbstractSeed;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Posts seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'username' => 'admin',
                'password' => $this->_setPassword('admin'),
                'created' => '2019-12-02 10:00:00',
                'modified' => '2019-12-02 10:00:00'
            ],[
                'username' => 'yamada',
                'password' => $this->_setPassword('yamada'),
                'created' => '2020-01-03 10:00:00',
                'modified' => '2020-01-03 10:00:00'
            ]
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
