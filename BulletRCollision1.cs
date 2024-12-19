// aktywacja OnHitR dla obieku trafionego prawym pociskiem
using UnityEngine;

public class BulletRCollision : MonoBehaviour
{
    void OnCollisionEnter(Collision collision)
    {
        if (collision.gameObject.CompareTag("Switch"))
        {
            collision.gameObject.GetComponent<Target>().OnHitR();
        }
        Destroy(gameObject);
    }
}
