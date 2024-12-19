using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class BlockMoving : MonoBehaviour
{
    private bool moved = true;
    public float speed = 2f;

    [System.Serializable]
    public class ObjectComponentConfig
    {
        public GameObject targetObject;
        public Vector3 positionA;
        public Vector3 positionB;
    }
    
    public List<ObjectComponentConfig> objectConfigs;

    void Update()
    {
        foreach (var config in objectConfigs)
        {
            if (moved)
            {
                config.targetObject.transform.position = Vector3.MoveTowards(config.targetObject.transform.position, config.positionA, speed * Time.deltaTime);
            }
            else
            {
                config.targetObject.transform.position = Vector3.MoveTowards(config.targetObject.transform.position, config.positionB, speed * Time.deltaTime);
            }
        }
    }

    private void OnTriggerEnter(Collider other)
    {
        if (other.CompareTag("Bullet"))
        {
            moved = !moved;
        }
    }
}
