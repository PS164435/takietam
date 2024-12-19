// wystrzeliwywanie pocisku
using UnityEngine;
using UnityEngine.XR;
using UnityEngine.XR.Interaction.Toolkit;
using UnityEngine.InputSystem;

public class FireBulletOnActive : MonoBehaviour
{
    public GameObject bullet;
    public Transform spawnPoint;
    public float bulletSpeed = 20;

    public InputActionProperty triggerAction;
    public InputActionProperty gripAction;

    void Start()
    {
        triggerAction.action.performed += ctx => FireBullet();
    }

    public void FireBullet()
    {
        if (gripAction.action.ReadValue<float>() > 0.1f && triggerAction.action.ReadValue<float>() > 0.1f)
        {
            GameObject spawnedBullet = Instantiate(bullet, spawnPoint.position, Quaternion.identity);
            spawnedBullet.GetComponent<Rigidbody>().velocity = spawnPoint.forward * bulletSpeed;
            Destroy(spawnedBullet, 5);
        }
    }
}