<?php


class card
{
    private $id;
    private $id_pair;
    private $image_path;
    private $visibility = 'hidden';
    private $state = 'inGame';

    public function __construct($id, $id_pair, $image_path)
    {
        $this->id = $id;
        $this->id_pair = $id_pair;
        $this->image_path = $image_path;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getIdPair()
    {
        return $this->id_pair;
    }

    /**
     * @return mixed
     */
    public function getImagePath()
    {
        return $this->image_path;
    }

    /**
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    public function switchVisibility($session, $id_card)
    {
        if ($this->visibility == 'hidden' && $_SESSION != $id_card) {
            $session->write('lastCard', $id_card);
            return $this->visibility = 'visible';
        }
        return $this->visibility;
    }

    public function visibilityReset(){
        return $this->visibility = 'hidden';
    }

    /**
     * @param string $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }
}