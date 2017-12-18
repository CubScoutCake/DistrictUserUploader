<?php
/**
 * Created by PhpStorm.
 * User: jacob
 * Date: 18/12/2017
 * Time: 19:30
 */

echo $this->Form->create($document, ['type' => 'file']);
echo $this->Form->file('submittedfile');