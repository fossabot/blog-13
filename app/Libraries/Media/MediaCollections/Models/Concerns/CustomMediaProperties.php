<?php

namespace App\Libraries\Media\MediaCollections\Models\Concerns;

trait CustomMediaProperties
{
    /**
     * @param array $customHeaders
     * @return $this
     */
    public function setCustomHeaders(array $customHeaders): self
    {
        $this->setCustomProperty('custom_headers', $customHeaders);

        return $this;
    }

    /**
     * @return array
     */
    public function getCustomHeaders(): array
    {
        return $this->getCustomProperty('custom_headers', []);
    }
}
