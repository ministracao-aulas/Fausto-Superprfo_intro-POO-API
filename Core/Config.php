<?php

namespace Core;

class Config
{
    /**
     * function config
     *
     * @param string $key
     * @param $default_value
     * @return $config_value
     */
    public static function config(string $key, $default_value = null)
    {
        return self::configData()[$key] ?? $default_value;
    }

    /**
     * function configData
     *
     * @return array
     */
    protected static function configData() :array
    {
        $config_file = __DIR__."/../Configs/config.php";

        if (!file_exists($config_file))
        {
            throw new \Exception("O arquivo de configuração não foi encontrado. [$config_file]", 1);
        }

        return require $config_file;
    }
}
