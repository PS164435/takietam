// zatrzymanie gracza przy czarnej linii
using UnityEngine;

public class Black_Invisible_Wall : MonoBehaviour
{
    public GameObject player;
    public float pozX;
    public float pozY;
    public float pozZ;

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Player"))
        {
            Vector3 currentPosition = player.transform.position;
            currentPosition.x += pozX;
            currentPosition.y += pozY;
            currentPosition.z += pozZ;
            player.transform.position = currentPosition;
        }
    }
}
