// aktywacja OnHitL dla obieku trafionego lewym pociskiem
using UnityEngine;

public class BulletLCollision : MonoBehaviour
{
    void OnCollisionEnter(Collision collision)
    {
        if (collision.gameObject.CompareTag("Switch"))
        {
            collision.gameObject.GetComponent<Target>().OnHitL();
        }
        Destroy(gameObject);
    }
}
