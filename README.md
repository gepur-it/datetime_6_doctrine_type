---
How to write doctrine type "datetime(6)" 
---

### to your Symfony project

Add ```datetime(6):  GepurIt\TinyintType\Datetime6DoctrineType``` to types of dbal in doctrine. See example:

```yaml
# Doctrine Configuration
doctrine:
    dbal:
        default_connection: default
        connections:
            default:     .gitignore.gitignore
            some_other:
                
        datetime(6):
            class: GepurIt\Datetime6Type\Datetime6DoctrineType
            commented: false

```

SQL type = 'DATETIME(6)'.

Example of entity:

```php
namespace YourBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/** Class EntityWithEmailField
  * @package YourBundle\Entity
  *
  * @ORM\Table(
  *     name="your_table_name",
  *     options={"collate"="utf8mb4_unicode_ci", "charset"="utf8mb4"}
  * )
  * @ORM\Entity(repositoryClass="YourBundle\Repository\EntityWithTynyintFieldRepository")
  */
class EntityWithDatetime6Field
{
    /**
     * @var integer
     *
     * @ORM\Column(name="created_at", type="datetime(6)", nullable=false)
     */
    protected $createdAt = 0;

    /**
     * @return \DateTime
     */
    public function getDirection(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setDirection(\DateTime $createdAt): \DateTime
    {
        $this->createdAt = $createdAt;
    }
}
```
