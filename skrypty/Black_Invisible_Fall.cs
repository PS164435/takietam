// teleportacja gracza po upadku na kolce
using UnityEngine;

public class Black_Invisible_Fall : MonoBehaviour
{
    public Transform playerSpawnPosition;
    public GameObject player;

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Player"))
        {
            player.transform.position = playerSpawnPosition.position;
        }
    }
}
