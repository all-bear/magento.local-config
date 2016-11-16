<?php

namespace AllBear\LocalConfig\Framework\App\Config;

class Data extends \Magento\Framework\App\Config\Data
{
    const LOCAL_CONFIG_FILE_NAME = '.local_config.json';

    private $localConfig = null;

    private function getLocalConfig()
    {
        if (is_null($this->localConfig)) {
            $this->localConfig = [];

            $configFileName = BP . DIRECTORY_SEPARATOR . self::LOCAL_CONFIG_FILE_NAME;

            if (file_exists($configFileName)) {
                $configJson = file_get_contents($configFileName);
                $this->localConfig = json_decode($configJson, true);

                if (!$this->localConfig) {
                    $this->localConfig = [];
                }
            }
        }

        return $this->localConfig;
    }

    private function getLocalConfigValue($path)
    {
        $config = $this->getLocalConfig();

        if (isset($config[$path])) {
            return $config[$path];
        }

        return null;
    }

    public function getValue($path = null)
    {
        $localValue = $this->getLocalConfigValue($path);

        return !is_null($localValue) ? $localValue : parent::getValue($path);
    }
}