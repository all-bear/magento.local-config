<?php

namespace AllBear\LocalConfig\Framework\App\Config;

class Data extends \Magento\Framework\App\Config\Data
{
    const LOCAL_CONFIG_FILE_NAME = '.local_config';

    private $localConfig = null;

    private function getLocalConfig()
    {
        if (is_null($this->localConfig)) {
            $this->localConfig = [];

            $configFileName = BP . DIRECTORY_SEPARATOR . self::LOCAL_CONFIG_FILE_NAME;

            if (file_exists($configFileName)) {
                $configLines = file($configFileName);

                foreach ($configLines as $configLine) {
                    list($path, $value) = explode(' ', $configLine, 2);

                    $this->localConfig[$path] = $value;
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